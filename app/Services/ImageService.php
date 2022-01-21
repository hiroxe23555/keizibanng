<?php

namespace App\Services;

use Exception;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\ImageRepository;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    /**
     * @var ImageRepository
     */
    protected $image_repository;

    /**
     * ImageService constructor.
     *
     * @param ImageRepository $image_repository
     */
    public function __construct(
        ImageRepository $image_repository
    ) {
        $this->image_repository = $image_repository;
    }
    
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Create new image and put s3
     *
     * @param array $images
     * @param int $message_id
     *
     * @return Image $image
     */
    public function createNewImages(array $images, int $message_id)
    {
        DB::beginTransaction();
        try {
            foreach ($images as $image) {
                $name = $image->getClientOriginalName();
                $path = Image::make($image)->resize(2000,1800)->save(public_path().'/storage/app/public/'.$name);
                $data = [
                    'image_file_path' => $name,
                    'message_id' => $message_id
                ];
                $this->image_repository->create($data);
            }
        } catch (Exception $error) {
            DB::rollBack();
            dd($error);
            throw $error;
        }
        DB::commit();

        return $image;
    }
        /**
     * Create temporary url from path
     *
     * @param String $s3_file_path
     * @return String
     */
    public function createTemporaryUrl(String $image_file_path)
    {
        return Storage::disk('local')->url($image_file_path, Carbon::now()->addDay());
    }
}