<?php

/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/10/16
 * Time: 3:44 PM
 */

namespace console\controllers;

use common\models\Customer;
use common\models\Driver;
use common\modules\vehicle\models\VehicleModel;
use common\modules\vehicle\models\VehicleType;
use common\utilities\ArraySimple;
use yii\console\controllers\AssetController;
use Faker\Factory;
use yii\helpers\Console;

class FakerController extends AssetController
{
    public function actionCustomer()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 40; $i++) {
            $customer = new Customer();
            $customer->email = $faker->email;
            $customer->phone_number = $faker->phoneNumber;
            $customer->first_name = $faker->firstName;
            $customer->last_name = $faker->lastName;
            $customer->display_name = "$customer->first_name $customer->last_name";
            $customer->date_of_birth = $faker->date("Y-m-d H:i:s");
            $customer->gender = ArraySimple::random(['male', 'female']);
            $customer->activity = $faker->sentence;
            $customer->is_verified = rand(0,1);
            $customer->status = STATUS_ACTIVE;
            $customer->save();
        }
        echo $this->ansiFormat('Fake customer done', Console::FG_YELLOW) . PHP_EOL;
        return 1;

    }

    public function actionDriver()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 40; $i++) {
            $driver = new Driver();
            $driver->email = $faker->email;
            $driver->phone_number = $faker->phoneNumber;
            $driver->first_name = $faker->firstName;
            $driver->last_name = $faker->lastName;
            $driver->display_name = "$driver->last_name $driver->first_name ";
            $driver->date_of_birth = $faker->date("Y-m-d H:i:s");
            $driver->gender = ArraySimple::random(['male', 'female']);
            $driver->is_verified = rand(0,1);
            $driver->status = STATUS_ACTIVE;
            $driver->driver_license_number = (string)$faker->numberBetween(1000000, 9000000);
            $driver->driver_license_type = $faker->word;
            $driver->experience_years = rand(2, 20);
            $driver->rating = rand(1, 5);
            $driver->is_verified = rand(0, 1);
            $driver->balance = $faker->numberBetween(1000000, 10000000);
            $driver->bank_account_name = $faker->name;
            $driver->bank_account_number = $faker->bankAccountNumber;
            
            $driver->save();
            
        }
        echo $this->ansiFormat('Fake driver done', Console::FG_YELLOW) . PHP_EOL;
        return 1;
    }

    public function actionMasterVehicleModel()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 40; $i++) {
            $vehicleModel = new VehicleModel();
            $vehicleModel->status = STATUS_ACTIVE;
            $vehicleModel->model_code = $faker->unique()->text;
            $vehicleModel->brand_code = ArraySimple::random(['ABCD123', 'DFGH3456', 'DSAF6543']);
            $vehicleModel->brand_name = $faker->streetName;
            $vehicleModel->vehicle_type_code = ArraySimple::random(['ToDFG', 'DFGytr', 'ToHGFD']);
            $vehicleModel->serial_year = rand(2000, 2016);

            $vehicleModel->save();

        }
        echo $this->ansiFormat('Fake Master Vehicle Model done', Console::FG_YELLOW) . PHP_EOL;
        return 1;
    }

    public function actionMasterVehicleType(){
        $faker = Factory::create();
        for ($i = 0; $i < 40; $i++) {
            $vehicleType = new VehicleType();
            $vehicleType->status = STATUS_ACTIVE;
            $vehicleType->code = $faker->unique()->countryCode;
            $vehicleType->name = $faker->name;

            $vehicleType->save();

        }
        echo $this->ansiFormat('Fake Master Vehicle Type done', Console::FG_YELLOW) . PHP_EOL;
        return 1;
    }

}