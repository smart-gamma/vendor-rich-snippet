<?php

namespace Gamma\RichSnippet\RichSnippetBundle\Extensions;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * ShopTwig extension
 */
class RichSnippetTwig extends \Twig_Extension
{
	private $container;

	private $environment;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}

	public function initRuntime(\Twig_Environment $environment)
	{
		$this->environment = $environment;
	}

	/**
	 * Returns a list of functions.
	 *
	 * @return array
	 */
    public function getFunctions()
    {
        return array(
            'review_aggregation_snippet' => new \Twig_Function_Method($this, 'reviewAggregationSnippet'), // reviews aggregate snippet
        );
    }
    
    /**
     * Render reviews aggregate rich snippet
     * @param type $review
     * @param type $format
     */
    public function reviewAggregationSnippet($review, $format = 'rdfa') 
    {
        return $this->container->get('templating')->render("GammaRichSnippetBundle:Reviews:". $format .".html.twig", array('review' => $review));
    }
    
    public function getName()
	{
		return 'gamma_rich_snippet_extension';
	}    
}


