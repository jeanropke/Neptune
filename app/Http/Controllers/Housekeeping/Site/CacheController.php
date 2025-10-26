<?php

namespace App\Http\Controllers\Housekeeping\Site;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class CacheController extends Controller
{
    public function settings()
    {
        abort_unless_permission('can_manage_cached');

        return view('housekeeping.site.cache.settings');
    }

    public function settingsSave(Request $request)
    {
        $request->validate([
            'habboimaging_figure_cached'    => 'required|in:0,1',
            'habboimaging_badges_cached'    => 'required|in:0,1',
            'habboimaging_photos_cached'    => 'required|in:0,1'
        ]);

        set_cms_config('habboimaging.figure.cached', $request->habboimaging_figure_cached);
        set_cms_config('habboimaging.badges.cached', $request->habboimaging_badges_cached);
        set_cms_config('habboimaging.photos.cached', $request->habboimaging_photos_cached);

        create_staff_log('cached.setting.save', $request);

        return redirect()->back()->with('message', 'Cached settings updated!');
    }

    protected function listFiles(string $disk, string $folder, string $urlPrefix, int $perPage = 25, bool $extractId = false)
    {
        abort_unless_permission('can_manage_cached');

        $page = request()->get('page', 1);

        $files = collect(Storage::disk($disk)->files($folder))->map(function ($path) use ($urlPrefix, $extractId, $disk) {
            $name = basename($path);

            $idOrName = $name;
            if ($extractId && preg_match('/_(\d+)\./', $name, $matches)) {
                $idOrName = $matches[1];
            }

            return (object)[
                'path'          => $path,
                'name'          => $name,
                'size'          => Storage::disk($disk)->size($path),
                'url'           => Storage::disk($disk)->url($path),
                'last_modified' => Carbon::parse(Storage::disk($disk)->lastModified($path)),
            ];
        });

        return new LengthAwarePaginator(
            $files->forPage($page, $perPage),
            $files->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }

    public function badgesListing()
    {
        $paginated = $this->listFiles('habboimaging', 'badges', 'habbo-imaging/badge');
        return view('housekeeping.site.cache.badges', ['badges' => $paginated]);
    }

    public function photosListing()
    {
        $paginated = $this->listFiles('habboimaging', 'photos', 'habbo-imaging/photo', 25, true);
        return view('housekeeping.site.cache.photos', ['photos' => $paginated]);
    }

    public function figuresListing()
    {
        $paginated = $this->listFiles('habboimaging', 'figure', 'habbo-imaging/figure', 25, true);
        return view('housekeeping.site.cache.figures', ['figures' => $paginated]);
    }

    protected function deleteCachedFile(Request $request, string $folder, string $logAction, string $successMessage, string $errorMessage)
    {
        if (!user()->hasPermission('can_manage_cached')) {
            return view('housekeeping.ajax.accessdenied_dialog');
        }

        $disk = Storage::disk('habboimaging');
        $filePath = $folder . '/' . $request->id;

        if (!$disk->exists($filePath)) {
            return view('housekeeping.ajax.dialog_result')->with([
                'status'  => 'error',
                'message' => $errorMessage,
            ]);
        }

        $disk->delete($filePath);

        create_staff_log($logAction, $request);

        return view('housekeeping.ajax.dialog_result')->with([
            'status'  => 'success',
            'message' => $successMessage,
        ]);
    }

    public function badgesDelete(Request $request)
    {
        return $this->deleteCachedFile(
            $request,
            'badges',
            'cache.badges.delete',
            'Group badge deleted!',
            'This group badge does not exist!'
        );
    }

    public function photosDelete(Request $request)
    {
        return $this->deleteCachedFile(
            $request,
            'photos',
            'cache.photos.delete',
            'Photo deleted!',
            'This photo does not exist!'
        );
    }

    public function figuresDelete(Request $request)
    {
        return $this->deleteCachedFile(
            $request,
            'figure',
            'cache.figures.delete',
            'Figure deleted!',
            'This figure does not exist!'
        );
    }
}
