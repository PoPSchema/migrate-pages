<?php
namespace PoP\Pages;

interface FunctionAPI
{
    public function getHomeStaticPage();
    public function getPageURL($page_id);
	public function getPage($page_id);
	public function getContent($page_id);
	public function getTitle($page_id);
	public function getPages($query, array $options = []);
}
