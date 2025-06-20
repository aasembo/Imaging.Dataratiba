<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dept Entity
 *
 * @property int $id
 * @property string|null $deptno
 * @property string|null $dname
 * @property string|null $loc
 */
class Dept extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'deptno' => true,
        'dname' => true,
        'loc' => true,
    ];
}
