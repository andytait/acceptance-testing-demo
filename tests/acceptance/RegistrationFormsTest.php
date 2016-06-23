<?php

use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Session;

class RegistrationFormsTest extends TestCase
{
    /**
     * Test uk registration form process
     */
    public function testUkForm()
    {
        $faker = Faker\Factory::create();

        $session = new Session(new GoutteDriver);
        $session->start();

        $session->visit($this->baseUrl . 'en/register/step-1');

        // Step 1
        $session->getPage()->selectFieldOption(
            'title',
            $session->getPage()->find('css', 'select[name=title] option:nth-child(2)')->getAttribute('value')
        );

        $session->getPage()->fillField('first_name', $faker->firstName);
        $session->getPage()->fillField('last_name', $faker->lastName);
        $session->getPage()->fillField('email', $faker->safeEmail);

        $session->getPage()->pressButton(trans('form.buttons.next'));

        // Step 2
        $session->getPage()->fillField('address1', $faker->streetAddress);
        $session->getPage()->fillField('address2', $faker->streetAddress);
        $session->getPage()->fillField('address3', $faker->streetAddress);
        $session->getPage()->fillField('city', $faker->city);
        $session->getPage()->fillField('region', $faker->word);
        $session->getPage()->fillField('postcode', $faker->postcode);

        $session->getPage()->pressButton(trans('form.buttons.next'));

        // Step 3 (With VAT number)
        $session->getPage()->fillField('password', $faker->password);
        $session->getPage()->fillField('vat_number', $faker->numerify('##########'));

        $session->getPage()->pressButton(trans('form.buttons.next'));

        // Completed
        $this->assertContains(trans('form.completed.confirmation'), $session->getPage()->getContent());
    }

    /**
     * @return array
     */
    public function getEuropeanCountryLocales()
    {
        return [
            ['es'],
            ['fr'],
        ];
    }

    /**
     * @dataProvider getEuropeanCountryLocales
     *
     * Test european registration form process
     *
     * @param string $countryLocale
     */
    public function testEuropeanForm($countryLocale)
    {
        $faker = Faker\Factory::create();

        $session = new Session(new GoutteDriver);
        $session->start();

        $session->visit($this->baseUrl . $countryLocale . '/register/step-1');

        // Step 1
        $session->getPage()->selectFieldOption(
            'title',
            $session->getPage()->find('css', 'select[name=title] option:nth-child(2)')->getAttribute('value')
        );

        $session->getPage()->fillField('first_name', $faker->firstName);
        $session->getPage()->fillField('last_name', $faker->lastName);
        $session->getPage()->fillField('email', $faker->safeEmail);

        $session->getPage()->pressButton(
            trans('form.buttons.next', $parameters = [], $domain = 'messages', $countryLocale)
        );

        // Step 2
        $session->getPage()->fillField('address1', $faker->streetAddress);
        $session->getPage()->fillField('address2', $faker->streetAddress);
        $session->getPage()->fillField('address3', $faker->streetAddress);
        $session->getPage()->fillField('city', $faker->city);
        $session->getPage()->fillField('region', $faker->word);
        $session->getPage()->fillField('postcode', $faker->postcode);

        $session->getPage()->pressButton(
            trans('form.buttons.next', $parameters = [], $domain = 'messages', $countryLocale)
        );

        // Step 3 (Without VAT number)
        $session->getPage()->fillField('password', $faker->password);

        $session->getPage()->pressButton(
            trans('form.buttons.next', $parameters = [], $domain = 'messages', $countryLocale)
        );

        // Completed
        $this->assertContains(
            trans('form.completed.confirmation', $parameters = [], $domain = 'messages', $countryLocale),
            $session->getPage()->getContent()
        );
    }
}