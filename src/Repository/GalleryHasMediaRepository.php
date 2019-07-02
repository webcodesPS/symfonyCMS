<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Application\Sonata\MediaBundle\Entity\GalleryHasMedia;

class GalleryHasMediaRepository extends ServiceEntityRepository
{

    /**
     * @var RequestStack
     */
    private $requestStack;

    public function __construct(RegistryInterface $registry, RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;

        parent::__construct($registry, GalleryHasMedia::class);
    }

    /**
     * @param $gallery
     * @return GalleryHasMedia[]
     */
    public function findGalleries($gallIds): array
    {
        $currentRequest = $this->requestStack->getCurrentRequest();

        $qb = $this->createQueryBuilder('ghm');
        $qb->select('ghm', 'g', 'm', 't');
        $qb->leftJoin('ghm.gallery', 'g');
        $qb->leftJoin('ghm.media', 'm');
        $qb->leftJoin('m.translates', 't')
            ->where('ghm.gallery IN(:ids)')
            ->andWhere('ghm.gallery IN(:ids)')
            ->andWhere('t.locale = :locale')
            ->andWhere('m.enabled = 1')
            ->setParameter('ids', $gallIds)
            ->setParameter('locale',
            $currentRequest->get('_locale') ?:
                  $currentRequest->getDefaultLocale()
            )
            ->orderBy('ghm.id', 'ASC');

        $query = $qb->getQuery();
        $result = $query->getArrayResult();

        return $result;
    }

}
