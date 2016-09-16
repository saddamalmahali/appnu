<?php

namespace app\modules\master\models;

use Yii;

/**
 * This is the model class for table "alamat_anggota".
 *
 * @property integer $id
 * @property string $rt
 * @property string $rw
 * @property integer $desakelurahan
 * @property integer $kecamatan
 *
 * @property Anggota[] $anggotas
 */
class AlamatAnggota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alamat_anggota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rt', 'rw', 'desakelurahan', 'kecamatan'], 'required'],
            [['desakelurahan', 'kecamatan'], 'integer'],
            [['rt'], 'string', 'max' => 10],
            [['rw'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'desakelurahan' => 'Desakelurahan',
            'kecamatan' => 'Kecamatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotas()
    {
        return $this->hasMany(Anggota::className(), ['alamat' => 'id']);
    }
}
