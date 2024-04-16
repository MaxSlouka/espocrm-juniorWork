<?php

namespace Espo\Modules\Autocrm\Controllers;

use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\NotFound;
use Espo\Core\Controllers\Record;
use Espo\ORM\Entity;

class Lead extends Record
{
    public function actionFindContacts($params, $data, $request)
    {
        if (!$request->isGet()) {
            throw new BadRequest("Tento požadavek vyžaduje GET metodu.");
        }

        if (empty($data->email)) {
            throw new BadRequest("Emailová adresa je vyžadována pro vyhledávání kontaktů.");
        }

        $contactRepository = $this->getEntityManager()->getRepository('Contact');

        $contacts = $contactRepository->where([
            'emailAddress' => $data->email
        ])->find();

        if (count($contacts) === 0) {
            throw new NotFound("Žádné kontakty s emailovou adresou '{$data->email}' nebyly nalezeny.");
        }

        $results = [];
        foreach ($contacts as $contact) {
            $results[] = [
                'id' => $contact->getId(),
                'name' => $contact->get('name'),
                'email' => $contact->get('emailAddress')
            ];
        }

        return $results;
    }
}