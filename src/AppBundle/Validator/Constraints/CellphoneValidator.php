<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-8-20
 * Time: 9:14
 */

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
class CellphoneValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if(! preg_match("/^1[3-5,8]{1}[0-9]{9}$/",$value,$matches)){
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        }
    }

}