<?php
/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 27/08/2018
 * Time: 15:17
 */

class QueryBuilder
{
    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * QueryBuilder constructor.11
     * @param $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $table
     * @return array
     */
    public function selectAllFrom($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * @param $table
     * @param $parameters
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (\Exception $e) {
            echo "Error with SQL statement";
        }
    }

    /**
     * @param $user_email
     * @return bool
     */
    public function checkUserRegistrationDetails($user_email)
    {
        if (!empty($user_email)) {
            $statement = $this->pdo->prepare("select * from users where users.email_address = '" . $user_email . "'");
            $statement->execute();

            $statement->fetchAll(PDO::FETCH_CLASS);
            $count = $statement->rowCount();

            if ($count === 1) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param $user_email
     * @param $user_pword
     * @return bool
     */
    public function checkUserLoginDetails($user_email, $user_pword)
    {
        if (!empty($user_email) || !empty($user_pword)) {
            $statement = $this->pdo->prepare("select * from users where users.email_address = '" . $user_email . "'");
            $statement->execute();

            $row   = $statement->fetch(PDO::FETCH_ASSOC);
            $count = $statement->rowCount();

            if ($count === 1) {
                if (password_verify($user_pword, $row['password'])) {
                    session_start();
                    $_SESSION['user_id']    = $row['user_id'];
                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['last_name']  = $row['last_name'];
                    $_SESSION['user_email'] = $row['email_address'];
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @param $fname
     * @param $lname
     * @param $email
     * @return bool
     */
    public function updateUserPersonalDetails($fname, $lname, $email)
    {
        session_start();
        if (!empty($fname) || !empty($lname) || !empty($email)) {
            $statement = $this->pdo->prepare("update users set users.first_name = '" . $fname . "', users.last_name = '" . $lname . "', users.email_address = '" . $email . "' where users.user_id = '" . $_SESSION['user_id'] . "'");

            $statement->execute();

            $_SESSION['first_name'] = $fname;
            $_SESSION['last_name']  = $lname;
            $_SESSION['user_email'] = $email;

            return true;
        }
        return false;
    }

    /**
     * @param $street
     * @param $city
     * @param $postcode
     * @param $country
     * @param $phonenumber
     * @param $active_shipping_address
     * @return bool
     */
    public function updateUserAddressDetails($street, $city, $postcode, $country, $phonenumber, $active_shipping_address)
    {
        session_start();
        if (!empty($street)
            && !empty($city)
            && !empty($postcode)
            && !empty($country)
            && !empty($phonenumber)
            && !empty($active_shipping_address)
        ) {
            $getActiveAddress = $this->pdo->prepare("select * from customer_address where customer_address.user_id = '" . $_SESSION['user_id'] . "' and customer_address.active_address = 1");

            $getActiveAddress->execute();
            $count = $getActiveAddress->rowCount();

            if ($count === 1) {
                $updateActiveAddress = $this->pdo->prepare("update customer_address set customer_address.active_address = 0 where customer_address.user_id = '" . $_SESSION['user_id'] . "'");

                $updateActiveAddress->execute();

                $update_billing_address_statement = $this->pdo->prepare("update customer_billing_address set customer_billing_address.active_address = 0 where customer_billing_address.user_id = '" . $_SESSION['user_id'] . "'");

                $update_billing_address_statement->execute();
            }

            $statement = $this->pdo->prepare("insert into customer_address (user_id, street_address, city, postcode, country, phone_number, active_address) VALUES ('" . $_SESSION['user_id'] . "', '" . $street . "', '" . $city . "', '" . $postcode . "', '" . $country . "', '" . $phonenumber . "', '1')");

            $billing_address_statement = $this->pdo->prepare("insert into customer_billing_address (user_id, street_address, city, postcode, country, phone_number, active_address) VALUES ('" . $_SESSION['user_id'] . "', '" . $street . "', '" . $city . "', '" . $postcode . "', '" . $country . "', '" . $phonenumber . "', '1')");

            $statement->execute();
            $billing_address_statement->execute();

            return true;
        }
        if (!empty($street)
            && !empty($city)
            && !empty($postcode)
            && !empty($country)
            && !empty($phonenumber)
            && empty($active_shipping_address)
        ) {
            $statement = $this->pdo->prepare("insert into customer_address (user_id, street_address, city, postcode, country, phone_number, active_address) VALUES ('" . $_SESSION['user_id'] . "', '" . $street . "', '" . $city . "', '" . $postcode . "', '" . $country . "', '" . $phonenumber . "', '0')");

            $statement->execute();

            return true;
        }
        return false;
    }

    /**
     * @return array|bool
     */
    public function getUserActiveShippingDetails()
    {
        if (!session_id()) session_start();
        if (!empty($_SESSION['user_id'])) {
            $addressStatement = $this->pdo->prepare(
                "select * from customer_address 
                           where customer_address.user_id = '" . $_SESSION['user_id'] . "'
                           and customer_address.active_address = '1'                          
            ");
            $addressStatement->execute();

            $userStatement = $this->pdo->prepare(
                "select * from users 
                           where users.user_id = '" . $_SESSION['user_id'] . "'                          
            ");
            $userStatement->execute();

            $addressRow      = $addressStatement->fetch(PDO::FETCH_ASSOC);
            $addressRowCount = $addressStatement->rowCount();

            $userRow      = $userStatement->fetch(PDO::FETCH_ASSOC);
            $userRowCount = $userStatement->rowCount();

            if ($addressRowCount === 1 || $userRowCount === 1) {
                return [
                    'fname'          => $userRow['first_name'],
                    'lname'          => $userRow['last_name'],
                    'email'          => $userRow['email_address'],
                    'street_address' => $addressRow['street_address'],
                    'city'           => $addressRow['city'],
                    'postcode'       => $addressRow['postcode'],
                    'country'        => $addressRow['country'],
                    'phone_number'   => $addressRow['phone_number']
                ];
            }
        }
        return false;
    }

    public function getUserActiveBillingDetails()
    {
        if (!session_id()) session_start();
        if (!empty($_SESSION['user_id'])) {
            $billAddressStatement = $this->pdo->prepare(
                "select * from customer_billing_address 
                           where customer_billing_address.user_id = '" . $_SESSION['user_id'] . "'
                           and customer_billing_address.active_address = '1'                          
            ");
            $billAddressStatement->execute();

            $userStatement = $this->pdo->prepare(
                "select * from users 
                           where users.user_id = '" . $_SESSION['user_id'] . "'                          
            ");
            $userStatement->execute();

            $billAddressRow      = $billAddressStatement->fetch(PDO::FETCH_ASSOC);
            $billAddressRowCount = $billAddressStatement->rowCount();

            $userRow      = $userStatement->fetch(PDO::FETCH_ASSOC);
            $userRowCount = $userStatement->rowCount();

            if ($billAddressRowCount === 1 || $userRowCount === 1) {
                return [
                    'bill_fname'          => $userRow['first_name'],
                    'bill_lname'          => $userRow['last_name'],
                    'bill_email'          => $userRow['email_address'],
                    'bill_street_address' => $billAddressRow['street_address'],
                    'bill_city'           => $billAddressRow['city'],
                    'bill_postcode'       => $billAddressRow['postcode'],
                    'bill_country'        => $billAddressRow['country'],
                    'bill_phone_number'   => $billAddressRow['phone_number']
                ];
            }
        }
        return false;
    }

}