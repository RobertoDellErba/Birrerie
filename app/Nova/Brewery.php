<?php

namespace App\Nova;


use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Waynestate\Nova\CKEditor;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Gravatar;
use R64\NovaImageCropper\ImageCropper;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Http\Requests\NovaRequest;

class Brewery extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Brewery::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Gravatar::make()->maxWidth(50),

            Text::make('Nome','name')
                ->sortable()
                ->rules('required', 'max:255'),

            CKEditor::make('Descrizione','description')
                ->sortable()
                ->rules('required', 'max:255')
                ->alwaysShow()
                ->hideFromIndex(),
                                

            ImageCropper::make('Immagine','img')
                     ->preview(function () {
                        if (!$this->value) return null;
            
                        $url = Storage::path($this->path)->url($this->value);
                        $filetype = pathinfo($url)['extension'];
                        return 'data:image/' . $filetype . ';base64,' . base64_encode(file_get_contents($url));
                        })
                     ->aspectRatio(3/2)
                     ->disableDownload()
                     ->path('/media'),
            
                   
                   
                
            Boolean::make('Approvato','is_approved'),
                
            

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
