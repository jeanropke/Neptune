<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class HelpController extends Controller
{
    public function versionChecker()
    {
        return response()->json($this->getLatestRelease());
    }

    private function getLatestRelease()
    {
        $owner = 'jeanropke';
        $repo = 'Neptune';

        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
            'User-Agent' => 'Neptune-Version-Checker'
        ])->get("https://api.github.com/repos/{$owner}/{$repo}/releases/latest");

        if ($response->failed()) {
            return ['error' => 'Unable to fetch the latest release.'];
        }

        $data = $response->json();

        return [
            'tag_name'     => $data['tag_name'] ?? null,
            'name'         => $data['name'] ?? null,
            'published_at' => isset($data['published_at']) ? Carbon::parse($data['published_at'])->format('M d, Y H:i:s') : null,
            'version'      => Str::startsWith($data['tag_name'] ?? '', 'v') ? substr($data['tag_name'], 1) : ($data['tag_name'] ?? null),
            'cms_version'  => config('cms.version')
        ];
    }
}
