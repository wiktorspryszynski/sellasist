<?php

namespace App\Http\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class PetstoreService
{
    private function client(): \Illuminate\Http\Client\PendingRequest
    {
        return Http::baseUrl(config('petstore.base_url'))
            ->timeout(config('petstore.timeout'));
    }

    public function getByStatus(string $status): array
    {
        try {
            return $this->client()
                ->get('/pet/findByStatus', ['status' => $status])
                ->throw()
                ->json();
        } catch (ConnectionException) {
            throw new \RuntimeException('Cannot connect to Petstore API');
        } catch (RequestException $e) {
            $this->handleRequestException($e);
        }
    }

    public function find(int $id): array
    {
        try {
            return $this->client()
                ->get("/pet/{$id}")
                ->throw()
                ->json();
        } catch (ConnectionException) {
            throw new \RuntimeException('Cannot connect to Petstore API');
        } catch (RequestException $e) {
            $this->handleRequestException($e);
        }
    }

    public function create(array $data): array
    {
        try {
            return $this->client()
                ->post('/pet', $data)
                ->throw()
                ->json();
        } catch (ConnectionException) {
            throw new \RuntimeException('Cannot connect to Petstore API');
        } catch (RequestException $e) {
            $this->handleRequestException($e);
        }
    }

    public function update(array $data): array
    {
        try {
            return $this->client()
                ->put('/pet', $data)
                ->throw()
                ->json();
        } catch (ConnectionException) {
            throw new \RuntimeException('Cannot connect to Petstore API');
        } catch (RequestException $e) {
            $this->handleRequestException($e);
        }
    }

    public function delete(int $id): void
    {
        try {
            $this->client()
                ->delete("/pet/{$id}")
                ->throw();
        } catch (ConnectionException) {
            throw new \RuntimeException('Cannot connect to Petstore API');
        } catch (RequestException $e) {
            $this->handleRequestException($e);
        }
    }

    private function handleRequestException(RequestException $e): never
    {
        if ($e->response->status() === 404) {
            throw new \RuntimeException('Pet not found');
        }

        throw new \RuntimeException($e->response->body());
    }
}
