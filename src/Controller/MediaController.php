<?php

namespace App\Controller;

use App\Application\Sonata\MediaBundle\Entity\Media;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Sonata\MediaBundle\Provider\ImageProvider;
use Symfony\Component\HttpFoundation\Response;

class MediaController extends AbstractController
{
    private $imageProvider;

    public function __construct(ImageProvider $imageProvider)
    {
        $this->imageProvider = $imageProvider;
    }

    public function getPublicUrl(Media $media, $format)
    {
        if (!$media) {
          return '';
        }

        return $this->imageProvider->generatePublicUrl($media, 'default_' . $format);
    }

    public function image($format, $id)
    {
        $repo = $this->getDoctrine()->getRepository('ApplicationSonataMediaBundle:Media')->find($id);

        if (null == $repo) {
          return new Response("", 404);
        }

        return new BinaryFileResponse($this->getParameter('kernel.project_dir') . '/public' . $this->getPublicUrl($repo, $format));
    }
}
