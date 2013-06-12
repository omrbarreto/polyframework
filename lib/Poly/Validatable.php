<?php

/**
 * PolyFramework(tm): Minimalist Lightweight PHP Framework (http://polyframework.org)
 * Copyright (c) 2009-2013, Polymedio Networks S.L. (http://www.polymedio.com)
 * All rights reserved.
 *
 * LICENSE
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/BSD-3-Clause
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@polymedio.com so we can send you a copy immediately.
 *
 */

include 'Overload.php';

class Poly_Validatable extends Poly_Overload {

	/**
	 * Errores encontrados durante la validacion
	 */
	public $validationErrors = array();

	/**
	 * Clase encargada de validar el objeto
	 */
	public $validator = null;

	/**
	 * Valida los datos antes de guardarlos
	 *
	 * @return  Boolean  Devuelve true si los datos son válidos
	 */
	function validate() {
		$this->validationErrors = array();
		if ($this->validator) {
			$Validator = new $this->validator($this);
			$Validator->validate();
			$this->validationErrors = $Validator->validationErrors;
			return empty($this->validationErrors);
		}
		return empty($this->validationErrors);
	}

}
