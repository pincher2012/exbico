<?php

declare(strict_types=1);

namespace app\models;

use app\domain\SeparatorParams;
use LogicException;
use yii\base\Model;

/**
 * Class ListSeparationModel.
 */
class ListSeparationForm extends Model
{
    /**
     * @var int
     */
    public $number;

    /**
     * @var array[]
     */
    public $list;

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'number',
            'list',
        ];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['number', 'list'], 'required'],
            ['number', 'integer'],
            ['list', 'each', 'rule' => ['integer']],
        ];
    }

    /**
     * @return SeparatorParams
     */
    public function getDto(): SeparatorParams
    {
        if ($this->hasErrors()) {
            throw new LogicException('Invalid method usage. Must be wrapped to isValid() call');
        }

        $number = (int) $this->number;
        $list = [];
        foreach ($this->list as $item) {
            $list[] = (int) $item;
        }

        return new SeparatorParams((int) $number, $list);
    }
}
