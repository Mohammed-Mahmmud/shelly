<?php

namespace App\Traits;

use Throwable;
use App\Enums\HttpStatus;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Http\Resources\Json\JsonResource;

trait ApiResponse
{
    public function success(string $message, array|null|JsonResource|Collection|AbstractPaginator $data = null,  $statusCode = 200)
    {
        $response = ['success' => true, 'message' => $message];

        if ($data !== null) {
            $response['data'] = $data instanceof AbstractPaginator ? $data->items() : $data;
        }

        if ($data instanceof AbstractPaginator) {
            $response = array_merge($response, [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
                'total' => $data->total(),
               ]);
        }

        return response()->json($response, $statusCode);
    }

    public function error(string $message,  $statusCode = 422)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $statusCode);
    }

    public function validationErrors(array | MessageBag $errors, string $message = 'Validation Failed',  $statusCode = 422)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => collect($errors)->map(fn($error) => $error[0])->toArray(),
        ], $statusCode);
    }

    public function serverError(Throwable $exception, string $message = null,  $statusCode = 500)
    {
        Log::error('Server Error', ['error' => $exception]);

        return response()->json([
            'success' => false,
            'message' => $message ?? 'Server Error',
        ], $statusCode);
    }

    public function paginated(string $message, array|AnonymousResourceCollection $data, ?array $extraData = null)
    {
        $response = response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data['data'],
            'meta' => [
                'current_page' => $data['meta']['current_page'],
                'from' => $data['meta']['from'],
                'to' => $data['meta']['to'],
                // 'next_page' => $data['meta']['last_page'] > $data['meta']['current_page']
                //     ? $data['meta']['current_page'] + 1
                //     : null,
                'last_page' => $data['meta']['last_page'],
                // 'path' => $data['meta']['path'],
                'per_page' => $data['meta']['per_page'],
                'total' => $data['meta']['total'],
                // 'links' => $data['meta']['links'],
            ],
        ]);
        return $extraData ? $response->setData(array_merge($response->getData(true), $extraData)) : $response;
    }
}