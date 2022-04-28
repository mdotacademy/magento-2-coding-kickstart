<?php declare(strict_types=1);

namespace Macademy\Blog\Model;

use Macademy\Blog\Api\Data\PostInterface;
use Macademy\Blog\Model\ResourceModel\Post as PostResourceModel;
use Macademy\Blog\Api\PostRepositoryInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class PostRepository implements PostRepositoryInterface
{
    public function __construct(
        private PostFactory $postFactory,
        private PostResourceModel $postResourceModel,
    ) {}

    public function getById(int $id): PostInterface
    {
        $post = $this->postFactory->create();
        $this->postResourceModel->load($post, $id);

        if (!$post->getId()) {
            throw new NoSuchEntityException(__('The blog post with "%1" ID doesn\'t exist.', $id));
        }

        return $post;
    }

    public function save(PostInterface $post): PostInterface
    {
        // TODO: Implement save() method.
    }

    public function deleteById(int $id): bool
    {
        // TODO: Implement deleteById() method.
    }
}
