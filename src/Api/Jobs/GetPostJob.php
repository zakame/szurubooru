<?php
class GetPostJob extends AbstractPostJob
{
	public function execute()
	{
		$post = $this->post;

		//todo: refactor this so that requiresPrivilege can accept multiple privileges
		if ($post->hidden)
			Access::assert(Privilege::ViewPost, 'hidden');
		Access::assert(Privilege::ViewPost);
		Access::assert(Privilege::ViewPost, PostSafety::toString($post->safety));

		CommentModel::preloadCommenters($post->getComments());

		return $post;
	}

	public function requiresPrivilege()
	{
		//temporarily enforced in execute
		return false;
	}
}
