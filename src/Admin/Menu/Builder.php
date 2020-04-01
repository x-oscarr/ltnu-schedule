<?php

namespace App\Admin\Menu;

use App\Entity\Callback;
use App\Entity\Category;
use App\Entity\Brand;
use App\Entity\ClientOrder;
use App\Entity\QuestionAboutProduct;
use App\Entity\Review;
use App\Admin\Service\OrderCountService;
use App\Entity\ServiceRequest;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Menu\FactoryInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Knp\Menu\ItemInterface;

class Builder
{
    private $factory;
    private $translator;
    private $em;

    /**
     * @param FactoryInterface $factory
     * @param TranslatorInterface $translator
     * @param EntityManagerInterface $entityManager
     *
     * Add any other dependency you need
     */
    public function __construct(
        FactoryInterface $factory,
        TranslatorInterface $translator,
        EntityManagerInterface $entityManager
    )
    {
        $this->factory = $factory;
        $this->translator = $translator;
        $this->em = $entityManager;
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('group', ['route' => 'admin_group_index', 'label' => 'Група', 'extras' => ['icon' => 'fa-tags fa-fw']]);
        $menu->addChild('lesson', ['label' => 'Предмет', 'extras' => ['icon' => 'fa-tags fa-fw']]);
        $menu->addChild('week', ['label' => 'Тиждень', 'extras' => ['icon' => 'fa-tags fa-fw']]);
        $menu->addChild('user', ['label' => 'Користувач', 'extras' => ['icon' => 'fa-tags fa-fw']]);

        // ... add more children

        return $menu;
    }
}
