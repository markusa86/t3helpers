<?php

namespace SaschaEnde\T3helpers\Utilities;

use TYPO3\CMS\Core\Configuration\ConfigurationManager;
use TYPO3\CMS\Core\SingletonInterface;

class Configuration implements SingletonInterface {

    private $configurationManager;
    private $extensionConfiguration;
    private $ext;

    /**
     * constructor
     *
     * will read in and unserialze the config as set by EM
     */
    public function setExtension($ext) {
        $this->ext = $ext;
        $this->configurationManager = t3h_injectClass(ConfigurationManager::class);
        $this->extensionConfiguration = unserialize($this->configurationManager->getConfigurationValueByPath('EXT/extConf/' . $ext));
    }

    public function get($propertyName) {
        if (array_key_exists($propertyName, $this->extensionConfiguration) === FALSE || $this->extensionConfiguration[$propertyName] == '') {
            throw new \TYPO3\CMS\Core\Exception('"' . $propertyName . '" must be configured in the ExtensionManager (EXT:' . $this->ext . ')', 1380287842);
        }
        return $this->extensionConfiguration[$propertyName];
    }

    public function getAll() {
        return t3h_arrayToObject($this->extensionConfiguration);
    }
}