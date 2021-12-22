<?php 

namespace App\Github;

use Illuminate\Support\Facades\Http;

class Github {

    private string $api = 'https://api.github.com';
    
    public function __construct(
        private string $personalToken, 
        private string $profile
        ) {
            if ($personalToken === null || $profile === null) {
                throw new \Exception('Personal token and profile must be set.');
            }
        }
        
    public function getProfile() {
        $response = Http::withToken($this->personalToken)->get($this->api . '/users/' . $this->profile, [
            'headers' => [
                'Authorization' => 'token ' . $this->personalToken
            ]
        ]);
        return $response->collect();
    }

    public function getRepos()
    {
        $response = Http::withToken($this->personalToken)->get($this->api . '/users/' . $this->profile . '/repos', [
            'headers' => [
                'Authorization' => 'token ' . $this->personalToken
            ]
        ]);
        return $response->collect();
    }

    public function getRepo($repo)
    {
        $response = Http::withToken($this->personalToken)->get($this->api . '/repos/' . $this->profile . '/' . $repo, [
            'headers' => [
                'Authorization' => 'token ' . $this->personalToken
            ]
        ]);
        return $response->collect();
    }

    public function getCommits($repo)
    {
        $response = Http::withToken($this->personalToken)->get($this->api . '/repos/' . $this->profile . '/' . $repo . '/commits', [
            'headers' => [
                'Authorization' => 'token ' . $this->personalToken
            ]
        ]);
        return $response->collect();
    }

    public function getContents($repo)
    {
        $response = Http::withToken($this->personalToken)->get($this->api . '/repos/' . $this->profile . '/' . $repo . '/contents/', [
            'headers' => [
                'Authorization' => 'token ' . $this->personalToken
            ]
        ]);
        return $response->collect();
    }

    public function getContent($repo, $path)
    {
        $response = Http::withToken($this->personalToken)->get($this->api . '/repos/' . $this->profile . '/' . $repo . '/contents/' . $path, [
            'headers' => [
                'Authorization' => 'token ' . $this->personalToken
            ]
        ]);
        return base64_decode($response->object()->content);
    }
}