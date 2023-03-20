<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FonctionelTest extends WebTestCase
{
    public function testIfCreateIngredientIsSuccessfull(): void
    {
        $client = static::createClient();
        $urlGenerator = $client->getContainer()->get('router');

        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');

        $crawler = $client->request(Request::METHOD_GET, $urlGenerator->generate('app_to_do_list_index'));

        $form = $crawler->filter('form[name=todolist]')->form([
            'todolist[title]' => "Un todolist",
            'todolist[status]' => is_bool(true)
        ]);

        $client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        $client->followRedirect();

        $this->assertRouteSame('app_to_do_list_index.index');
    }

}
