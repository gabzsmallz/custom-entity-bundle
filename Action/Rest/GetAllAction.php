<?php

namespace Pim\Bundle\CustomEntityBundle\Action\Rest;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author    Kevin Rademan <kevin@versa.co.za>
 * @copyright 2017 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class GetAllAction extends AbstractRestAction
{
    /**
     * {@inheritdoc}
     */
    protected function doExecute(Request $request): JsonResponse
    {
        $entities = $this->getManager()->findAll(
            $this->configuration->getEntityClass()
        );

        $normalizedEntities = [];
        foreach($entities as $entity) {
            $normalizedEntities[] = $this->normalize($entity);
        }

        return new JsonResponse($normalizedEntities);
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return 'rest_getall';
    }
}
