<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'AddAuthorBookingStatusPivot' => $baseDir . '/app/database/migrations/2014_01_25_092257_add_author_booking_status_pivot.php',
    'AddLocationToDealers' => $baseDir . '/app/database/migrations/2014_01_17_044810_add_location_to_dealers.php',
    'AddProfileIdToBooking' => $baseDir . '/app/database/migrations/2014_01_23_071417_add_profile_id_to_booking.php',
    'AddTitleToCustomerProfile' => $baseDir . '/app/database/migrations/2014_01_18_032345_add_title_to_customer_profile.php',
    'AddUserIdToXTable' => $baseDir . '/app/database/migrations/2014_01_13_103703_add_user_id_to_manufacturers_table.php',
    'AddUseridToDealers' => $baseDir . '/app/database/migrations/2014_01_16_091342_add_userid_to_dealers.php',
    'AddUseridToModels' => $baseDir . '/app/database/migrations/2014_01_16_071119_add_userid_to_models.php',
    'App\\Controllers\\Admin\\AuthController' => $baseDir . '/app/controllers/admin/AuthController.php',
    'App\\Controllers\\Admin\\DealersController' => $baseDir . '/app/controllers/admin/DealersController.php',
    'App\\Controllers\\Admin\\ManufacturersController' => $baseDir . '/app/controllers/admin/ManufacturersController.php',
    'App\\Controllers\\Admin\\ModelsController' => $baseDir . '/app/controllers/admin/ModelsController.php',
    'App\\Controllers\\Admin\\ServiceCentersController' => $baseDir . '/app/controllers/admin/ServiceCentersController.php',
    'App\\Controllers\\Api\\MainController' => $baseDir . '/app/controllers/Api/MainController.php',
    'App\\Controllers\\Customer\\AuthController' => $baseDir . '/app/controllers/customer/AuthController.php',
    'App\\Controllers\\Customer\\BookingsController' => $baseDir . '/app/controllers/customer/BookingsController.php',
    'App\\Controllers\\Customer\\ProfilesController' => $baseDir . '/app/controllers/customer/ProfilesController.php',
    'App\\Controllers\\Customer\\VehiclesController' => $baseDir . '/app/controllers/customer/VehiclesController.php',
    'App\\Controllers\\User\\AuthController' => $baseDir . '/app/controllers/user/AuthController.php',
    'App\\Models\\CustomerBooking' => $baseDir . '/app/models/CustomerBooking.php',
    'App\\Models\\CustomerBookingStatus' => $baseDir . '/app/models/CustomerBookingStatus.php',
    'App\\Models\\CustomerProfile' => $baseDir . '/app/models/CustomerProfile.php',
    'App\\Models\\CustomerVehicle' => $baseDir . '/app/models/CustomerVehicle.php',
    'App\\Models\\Dealer' => $baseDir . '/app/models/Dealer.php',
    'App\\Models\\Manufacturer' => $baseDir . '/app/models/Manufacturer.php',
    'App\\Models\\Model' => $baseDir . '/app/models/Model.php',
    'App\\Models\\ServiceCenter' => $baseDir . '/app/models/ServiceCenter.php',
    'App\\Models\\User' => $baseDir . '/app/models/User.php',
    'App\\Services\\Rules\\BookingRule' => $baseDir . '/app/services/rules/BookingRule.php',
    'App\\Services\\Rules\\CustomerBookingRule' => $baseDir . '/app/services/rules/CustomerBookingRule.php',
    'App\\Services\\Validators\\CustomerProfileValidator' => $baseDir . '/app/services/validators/CustomerProfileValidator.php',
    'App\\Services\\Validators\\CustomerVehicleValidator' => $baseDir . '/app/services/validators/CustomerVehicleValidator.php',
    'App\\Services\\Validators\\DealerValidator' => $baseDir . '/app/services/validators/DealerValidator.php',
    'App\\Services\\Validators\\ManufacturerValidator' => $baseDir . '/app/services/validators/ManufacturerValidator.php',
    'App\\Services\\Validators\\ModelValidator' => $baseDir . '/app/services/validators/ModelValidator.php',
    'App\\Services\\Validators\\ServiceCenterValidator' => $baseDir . '/app/services/validators/ServiceCenterValidator.php',
    'App\\Services\\Validators\\UserRegisterValidator' => $baseDir . '/app/services/validators/UserRegisterValidator.php',
    'App\\Services\\Validators\\Validator' => $baseDir . '/app/services/validators/Validator.php',
    'BaseController' => $baseDir . '/app/controllers/BaseController.php',
    'Cartalyst\\Sentry\\Groups\\GroupExistsException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
    'Cartalyst\\Sentry\\Groups\\GroupNotFoundException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
    'Cartalyst\\Sentry\\Groups\\NameRequiredException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
    'Cartalyst\\Sentry\\Throttling\\UserBannedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Throttling/Exceptions.php',
    'Cartalyst\\Sentry\\Throttling\\UserSuspendedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Throttling/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\LoginRequiredException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\PasswordRequiredException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserAlreadyActivatedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserExistsException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserNotActivatedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserNotFoundException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\WrongPasswordException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'CreateBookingStatus' => $baseDir . '/app/database/migrations/2014_01_25_052230_create_booking_status.php',
    'CreateBookingStatusPivot' => $baseDir . '/app/database/migrations/2014_01_25_075708_create_booking_status_pivot.php',
    'CreateCustomerBooking' => $baseDir . '/app/database/migrations/2014_01_17_090414_create_customer_booking.php',
    'CreateCustomerProfile' => $baseDir . '/app/database/migrations/2014_01_17_090351_create_customer_profile.php',
    'CreateCustomerVehicle' => $baseDir . '/app/database/migrations/2014_01_17_090409_create_customer_vehicle.php',
    'CreateDealersLocationsTable' => $baseDir . '/app/database/migrations/2014_01_12_082144_create-dealers_locations-table.php',
    'CreateDealersTable' => $baseDir . '/app/database/migrations/2014_01_12_080359_create-dealers-table.php',
    'CreateManufacturersTable' => $baseDir . '/app/database/migrations/2014_01_12_074129_create-manufacturers-table.php',
    'CreateModelsTable' => $baseDir . '/app/database/migrations/2014_01_12_074853_create-models-table.php',
    'CreateServiceCentersTable' => $baseDir . '/app/database/migrations/2014_01_12_083034_create-service_centers-table.php',
    'CustomerBookingStatusSeeder' => $baseDir . '/app/database/seeds/CustomerBookingStatusSeeder.php',
    'CustomerController' => $baseDir . '/app/controllers/customer/CustomerController.php',
    'DatabaseSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'DealerTableSeeder' => $baseDir . '/app/database/seeds/DealerTableSeeder.php',
    'HomeController' => $baseDir . '/app/controllers/HomeController.php',
    'IlluminateQueueClosure' => $vendorDir . '/laravel/framework/src/Illuminate/Queue/IlluminateQueueClosure.php',
    'ManufacturerTableSeeder' => $baseDir . '/app/database/seeds/ManufacturerTableSeeder.php',
    'MigrationCartalystSentryInstallGroups' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225929_migration_cartalyst_sentry_install_groups.php',
    'MigrationCartalystSentryInstallThrottle' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225988_migration_cartalyst_sentry_install_throttle.php',
    'MigrationCartalystSentryInstallUsers' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225921_migration_cartalyst_sentry_install_users.php',
    'MigrationCartalystSentryInstallUsersGroupsPivot' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot.php',
    'ModelTableSeeder' => $baseDir . '/app/database/seeds/ModelTableSeeder.php',
    'SentrySeeder' => $baseDir . '/app/database/seeds/SentrySeeder.php',
    'ServiceCenterTableSeeder' => $baseDir . '/app/database/seeds/ServiceCenterTableSeeder.php',
    'SessionHandlerInterface' => $vendorDir . '/symfony/http-foundation/Symfony/Component/HttpFoundation/Resources/stubs/SessionHandlerInterface.php',
    'TestCase' => $baseDir . '/app/tests/TestCase.php',
);
