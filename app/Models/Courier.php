<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    private static $courier, $image, $imageName, $imageUrl, $directory;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = 'image/courier-image/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function createCourier($request)
    {
        self::$courier = new Courier();
        self::$courier->name        = $request->name;
        self::$courier->description = $request->description;
        self::$courier->image       = self::getImageUrl($request);
        self::$courier->status      = $request->status;
        self::$courier->save();
    }
    public static function updateCourier($request, $id)
    {
        self::$courier = Courier::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$courier->image))
            {
                unlink(self::$courier->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$courier->image;
        }
        self::$courier->name        = $request->name;
        self::$courier->description = $request->description;
        self::$courier->image       = self::$imageUrl;
        self::$courier->status      = $request->status;
        self::$courier->save();
    }
    public static function deleteCourier($id)
    {
        self::$courier = Courier::find($id);
        if (file_exists(self::$courier->image))
        {
            unlink(self::$courier->image);
        }
        self::$courier->delete();
    }
}
