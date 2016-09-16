<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inf_lokasi".
 *
 * @property integer $lokasi_ID
 * @property string $lokasi_kode
 * @property string $lokasi_nama
 * @property integer $lokasi_propinsi
 * @property integer $lokasi_kabupatenkota
 * @property integer $lokasi_kecamatan
 * @property integer $lokasi_kelurahan
 */
class InfLokasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inf_lokasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lokasi_propinsi', 'lokasi_kecamatan', 'lokasi_kelurahan'], 'required'],
            [['lokasi_propinsi', 'lokasi_kabupatenkota', 'lokasi_kecamatan', 'lokasi_kelurahan'], 'integer'],
            [['lokasi_kode'], 'string', 'max' => 50],
            [['lokasi_nama'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lokasi_ID' => 'Lokasi  ID',
            'lokasi_kode' => 'Lokasi Kode',
            'lokasi_nama' => 'Lokasi Nama',
            'lokasi_propinsi' => 'Lokasi Propinsi',
            'lokasi_kabupatenkota' => 'Lokasi Kabupatenkota',
            'lokasi_kecamatan' => 'Lokasi Kecamatan',
            'lokasi_kelurahan' => 'Lokasi Kelurahan',
        ];
    }
}
