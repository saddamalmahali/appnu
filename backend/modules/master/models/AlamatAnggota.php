<?php

namespace app\modules\master\models;

use Yii;

/**
 * This is the model class for table "alamat_anggota".
 *
 * @property integer $id
 * @property integer $id_anggota
 * @property string $rt
 * @property string $rw
 * @property integer $desakelurahan
 * @property integer $kecamatan
 *
 * @property Anggota $idAnggota
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
            [['id_anggota', 'rt', 'rw', 'desakelurahan', 'kecamatan'], 'required'],
            [['id_anggota', 'desakelurahan', 'kecamatan'], 'integer'],
            [['rt'], 'string', 'max' => 10],
            [['rw'], 'string', 'max' => 45],
            [['id_anggota'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['id_anggota' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_anggota' => 'Id Anggota',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'desakelurahan' => 'Desakelurahan',
            'kecamatan' => 'Kecamatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAnggota()
    {
        return $this->hasOne(Anggota::className(), ['id' => 'id_anggota']);
    }
}
