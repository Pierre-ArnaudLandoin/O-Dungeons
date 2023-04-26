<?php

namespace App\Normalizer;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * Entity normalizer.
 */
class DoctrineDenormalizer implements DenormalizerInterface
{
    /** @var EntityManagerInterface * */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * {@inheritDoc}
     */
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return str_starts_with($type, 'App\\Entity\\') && is_numeric($data);
    }

    /**
     * {@inheritDoc}
     */
    public function denormalize($data, $type, $format = null, array $context = [])
    {
        return $this->em->find($type, $data);
    }
}
