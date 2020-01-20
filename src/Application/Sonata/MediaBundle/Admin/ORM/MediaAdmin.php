<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\Sonata\MediaBundle\Admin\ORM;

use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\MediaBundle\Admin\ORM\MediaAdmin as MediaBaseAdmin;

class MediaAdmin extends MediaBaseAdmin
{

  /**
   * {@inheritdoc}
   */
  public function configureListFields(ListMapper $listMapper)
  {
    echo 'hhhhhhhhhhhhhhhhhhhh';

    // parent::configureListFields($listMapper);
  }

  /**
   * {@inheritdoc}
   */
  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    //
  }

}
