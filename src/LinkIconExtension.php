<?php

namespace gorriecoe\LinkIcon;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

/**
 * Adds a logout link type to Link Object.
 *
 * @package silverstripe-linkicon
 */
class LinkIconExtension extends DataExtension
{
    /**
     * Has_one relationship
     * @var array
     */
    private static $has_one = [
        'Icon' => Image::class,
    ];

    /**
     * Relationship version ownership
     * @var array
     */
    private static $owns = [
        'Icon'
    ];

    /**
     * Defines tab to insert the icon_folder fields into.
     * @var string
     */
    private static $icon_tab = 'Main';

    /**
     * Defines folder to store the icons assets into.
     * @var string
     */
    private static $icon_asset_folder = 'Icons';

    /**
     * Defines summary fields commonly used in table columns
     * as a quick overview of the data for this dataobject
     * @var array
     */
    private static $summary_fields = [
        'Icon.CMSThumbnail' => 'Icon'
    ];

    /**
     * Update Fields
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {
        $owner = $this->owner;
        $tab = $owner->config()->get('icon_tab');
        $folder = $owner->config()->get('icon_asset_folder');
        $field = UploadField::create(
            'Icon',
            _t(__CLASS__ . '.ICON', 'Icon')
        )
        ->setFolderName($folder);
        if ($tab == 'Main') {
            $fields->insertAfter(
                'Type',
                $field
            );
        } else {
            $fields->addFieldToTab(
                $tab,
                $field
            );
        }
        return $fields;
    }
}
