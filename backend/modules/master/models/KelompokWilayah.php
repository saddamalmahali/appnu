<?php

namespace app\modules\master\models;

use Yii;

/**
 * This is the model class for table "kelompok_wilayah".
 *
 * @property integer $id
 * @property string $kode_kelompok
 * @property string $nama_kelompok
 */
class KelompokWilayah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kelompok_wilayah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_kelompok', 'nama_kelompok'], 'required'],
            [['kode_kelompok'], 'string', 'max' => 20],
            [['nama_kelompok'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_kelompok' => 'Kode Kelompok',
            'nama_kelompok' => 'Nama Kelompok',
        ];
    }
}
