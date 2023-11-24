<?php
/*
 * 2022-2023 Tijs Driven Development
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0) that is available
 * through the world-wide-web at this URL: http://www.opensource.org/licenses/OSL-3.0
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to magento@tijsdriven.dev so a copy can be sent immediately.
 *
 * @author Tijs van Raaij
 * @copyright 2022-2023 Tijs Driven Development
 * @license http://www.opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

declare(strict_types=1);

namespace TijsDriven\Base\Plugin;

use Magento\Backend\Model\Menu;
use Magento\Backend\Model\Menu\Builder;
use function var_dump;

class HideMenuItemPlugin
{
    const MENU_ITEM_TIJS_DRIVEN_BASE_ELEMENTS = 'TijsDriven_Base::elements';

    /**
     * @param \Magento\Backend\Model\Menu\Builder $subject
     * @param \Magento\Backend\Model\Menu $menu
     * @return \Magento\Backend\Model\Menu
     */
    public function afterGetResult(Builder $subject, Menu $menu): Menu
    {
        foreach ($menu as $id => $item) {
            if($item->getId() == self::MENU_ITEM_TIJS_DRIVEN_BASE_ELEMENTS && !$item->hasChildren()) {
                unset($menu[$id]);
                break;
            }
        }
        return $menu;
    }

}
