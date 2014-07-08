<?php
/**
 * This file is part of the macro-set package.
 *
 * (c) Ondřej Záruba <zarubaondra@gmail.com>
 *
 * For the full copyright and license information, please view the license.md
 * file that was distributed with this source code.
 */

namespace Kappa\MacroSet;

use Latte\Compiler;
use Latte\MacroNode;
use Latte\Macros\MacroSet;
use Latte\PhpWriter;

/**
 * Class UrlMacro
 * @package Kappa\MacroSet
 */
class UrlMacro extends MacroSet
{
	/**
	 * @param Compiler $compiler
	 */
	public static function install(Compiler $compiler)
	{
		/** @var \Latte\Macros\MacroSet $set */
		$set = new static($compiler);
		$set->addMacro('url', [$set, 'macroUrl']);
	}

	/**
	 * @param MacroNode $node
	 * @param PhpWriter $writer
	 * @return string
	 */
	public function macroUrl(MacroNode $node, PhpWriter $writer)
	{
		return $writer->write('if (\Nette\Utils\Validators::isURL(%node.word)) {
			echo \'<a href="\' . %node.word . \'">\' . %node.word . \'</a>\';
		}');
	}
} 