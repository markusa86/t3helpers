<?php

namespace SaschaEnde\T3helpers\Utilities;

interface InjectionsInterface {

    /**
     * @param $ext
     * @return $this
     */
    public function setExtension($ext);

    /**
     * @param $filepath
     */
    public function phpFile($filepath);

    /**
     * @param $filepath
     */
    public function jsFile($filepath);

    /**
     * @param $filepath
     */
    public function jsLibraryFile($filepath);

    /**
     * @param $filepath
     */
    public function cssFile($filepath);

    /**
     * @param $filepath
     */
    public function cssLibraryFile($filepath);

}