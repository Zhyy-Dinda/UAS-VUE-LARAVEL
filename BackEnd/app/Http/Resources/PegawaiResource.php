<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PegawaiResource extends JsonResource
{
    public $status;
    public $message;
    public $total;
    public $resource;

    public function __construct($status, $message, $total, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
        $this->total = $total;
    }
    public function toArray(Request $request): array
    {
        return [
            'status'   => $this->status,
            'Jumlah Data'   => $this->total,
            'message'   => $this->message,
            'data'      => $this->resource
        ];
    }
}