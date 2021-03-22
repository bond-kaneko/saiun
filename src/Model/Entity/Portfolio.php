<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Portfolio Entity.
 *
 * @property int                    $id
 * @property int                    $user_id
 * @property string                 $title
 * @property array                  $content
 * @property \Cake\I18n\FrozenTime  $created
 * @property \Cake\I18n\FrozenTime  $modified
 * @property \App\Model\Entity\User $user
 */
class Portfolio extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'instructor_id' => true,
        'title' => true,
        'created' => true,
        'modified' => true,
        'instructor' => true,
        'image_ufl' => true,
        'portfolio_contents' => true,
    ];
}
