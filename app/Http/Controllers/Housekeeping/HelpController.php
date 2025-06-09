<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HelpController extends Controller
{
    public function index()
    {
        return view('housekeeping.help.index');
    }

    public function bugs()
    {
        return view('housekeeping.help.bugs');
    }

    public function version()
    {
        return view('housekeeping.help.version');
    }

    public function versionChecker()
    {
        $release = $this->getLatestRelease();
        return response()->json($release);
    }

    public function getLatestRelease()
    {
        $owner = 'jeanropke';
        $repo = 'Neptune';

        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
        ])->get("https://api.github.com/repos/{$owner}/{$repo}/releases/latest");

        if ($response->successful()) {
            $data = $response->json();
            return [
                'tag_name'      => $data['tag_name'],
                'name'          => $data['name'],
                'published_at'  => Carbon::parse($data['published_at'])->format('M d, Y H:i:s'),
                'version'       => str_starts_with($data['tag_name'], 'v') ? substr($data['tag_name'], 1) : $data['tag_name'],
                'cms_version'   => config('cms.version')
            ];
        }

        return ['error' => 'Unable to fetch the latest release.'];

    }
}
