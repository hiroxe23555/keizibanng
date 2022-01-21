<?php
namespace App\Repositories;
use App\Imagetable;
class ImageRepository
{
    /**
     * @var Imagetable
     */
    protected $image;
    /**
     * ImageRepository constructor.
     *
     * @param Imagetable $Image
     */
    public function __construct(Imagetable $image)
    {
        $this->image = $image;
    }
    /**
     * Create new Image.
     *
     * @param array $data
     * @return Imagetable $image
     */
    public function create(array $data)
    {
        return $this->image->create($data);
    }
}