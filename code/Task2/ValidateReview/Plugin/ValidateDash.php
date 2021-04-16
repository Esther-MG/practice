<?php


namespace Task2\ValidateReview\Plugin;


class ValidateDash
{
    const DASH_VALIDATION_ERROR = 'Please your username cannot have dashes.';
    function afterValidate(
        \Magento\Review\Model\Review $subject, $result
    ) {
        if (strpos($subject->getNickname(), '-')) {
            //Validation to show first the dash error
            if($result === true) {
                return array(__(self::DASH_VALIDATION_ERROR));
            } elseif (is_array($result)) {
                $result[] = __(self::DASH_VALIDATION_ERROR);
                return $result;
            }
        }
        return $result;
    }
}
