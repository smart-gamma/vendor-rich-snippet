<?php

namespace LaMelle\ShopBundle\Extensions;

use Symfony\Component\Templating\EngineInterface;
use \Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
/**
 * ShopTwig extension
 */
class ShopTwig extends \Twig_Extension
{
	private $templating;

	private $environment;

	public function __construct(EngineInterface $templating)
	{
		$this->templating = $templating;
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
            'review_aggregate_snippet' => new \Twig_Function_Method($this, 'reviewAggregateSnippet'), // reviews aggregate snippet
        );
    }
    
    /**
     * Render reviews aggregate rich snippet
     * @param type $review
     * @param type $format
     */
    public function reviewAggregateSnippet($review, $format = 'pdfa') 
    {
        return $templating->render("GammaRichSnippetBundle:Reviews:". $format .".html.twig", array('review' => $review));
    }
}


