<?php

/**
 * This is the model class for table "buyer_details".
 *
 * The followings are the available columns in table 'buyer_details':
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string $pan_card
 * @property string $dob
 * @property string $gender
 * @property string $bank_accnt_number
 * @property string $bank_ifsc_code
 * @property string $company_name
 * @property string $phone_no_2
 * @property integer $newsletter
 * @property string $wallet_amt
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 * @property integer $status
 * @property integer $field3
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class BuyerDetails extends CActiveRecord {

        public $verifyCode;

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'buyer_details';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('first_name, last_name, password, pan_card, dob, gender, bank_accnt_number, bank_ifsc_code, phone_no_2', 'required'),
                    array('user_id, newsletter, CB, UB, status, field3', 'numerical', 'integerOnly' => true),
                    array('first_name, last_name, phone_no_2', 'length', 'max' => 100),
                    array('email, password, bank_ifsc_code, company_name', 'length', 'max' => 250),
                    array('pan_card, bank_accnt_number', 'length', 'max' => 200),
                    array('gender', 'length', 'max' => 50),
                    array('password', 'length', 'max' => 15, 'min' => 5),
                    array('wallet_amt', 'length', 'max' => 10),
                    array('gender', 'length', 'max' => 50),
                    array('wallet_amt', 'length', 'max' => 10),
//                    array('first_name,last_name,phone_no_2,email,address', 'required', 'on' => 'settings'),
//                    array('email', 'unique', 'on' => 'settings'),
//                    array('email', 'email', 'on' => 'settings'),
//                    array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_id, first_name, last_name,email, password, pan_card, dob, gender, bank_accnt_number, bank_ifsc_code, company_name, phone_no_2, newsletter, wallet_amt, CB, UB, DOC, DOU, status, field3', 'safe', 'on' => 'search'),
                    array('first_name,last_name,dob,password,email,phone_no_2,gender', 'required', 'on' => 'create'),
                    array('email', 'email', 'on' => 'create'),
                    array('email', 'unique', 'on' => 'create'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'user_id' => 'User',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'email' => 'Email',
                    'password' => 'Password',
                    'pan_card' => 'Pan Card',
                    'dob' => 'Dob',
                    'gender' => 'Gender',
                    'bank_accnt_number' => 'Bank Accnt Number',
                    'bank_ifsc_code' => 'Bank Ifsc Code',
                    'company_name' => 'Company Name',
                    'phone_no_2' => 'Phone No 2',
                    'newsletter' => 'Newsletter',
                    'wallet_amt' => 'Wallet Amt',
                    'CB' => 'Cb',
                    'UB' => 'Ub',
                    'DOC' => 'Doc',
                    'DOU' => 'Dou',
                    'status' => 'Status',
                    'field3' => 'Field3',
                );
        }

        /**
         * Retrieves a list of models based on the current search/filter conditions.
         *
         * Typical usecase:
         * - Initialize the model fields with values from filter form.
         * - Execute this method to get CActiveDataProvider instance which will filter
         * models according to data in model fields.
         * - Pass data provider to CGridView, CListView or any similar widget.
         *
         * @return CActiveDataProvider the data provider that can return the models
         * based on the search/filter conditions.
         */
        public function search() {
                // @todo Please modify the following code to remove attributes that should not be searched.

                $criteria = new CDbCriteria;

                $criteria->compare('id', $this->id);
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('first_name', $this->first_name, true);
                $criteria->compare('last_name', $this->last_name, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('password', $this->password, true);
                $criteria->compare('pan_card', $this->pan_card, true);
                $criteria->compare('dob', $this->dob, true);
                $criteria->compare('gender', $this->gender, true);
                $criteria->compare('bank_accnt_number', $this->bank_accnt_number, true);
                $criteria->compare('bank_ifsc_code', $this->bank_ifsc_code, true);
                $criteria->compare('company_name', $this->company_name, true);
                $criteria->compare('phone_no_2', $this->phone_no_2, true);
                $criteria->compare('newsletter', $this->newsletter);
                $criteria->compare('wallet_amt', $this->wallet_amt, true);
                $criteria->compare('CB', $this->CB);
                $criteria->compare('UB', $this->UB);
                $criteria->compare('DOC', $this->DOC, true);
                $criteria->compare('DOU', $this->DOU, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('field3', $this->field3);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return BuyerDetails the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}

?>
