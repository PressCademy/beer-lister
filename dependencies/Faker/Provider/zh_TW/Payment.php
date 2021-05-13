<?php

namespace Beer_List\Dependencies\Faker\Provider\zh_TW;

/**
 * @deprecated Use {@link \Beer_List\Dependencies\Faker\Provider\Payment} instead
 * @see \Beer_List\Dependencies\Faker\Provider\Payment
 */
class Payment extends \Beer_List\Dependencies\Faker\Provider\Payment
{
    /**
     * @return array
     *
     * @deprecated Use {@link \Beer_List\Dependencies\Faker\Provider\Payment::creditCardDetails()} instead
     * @see \Beer_List\Dependencies\Faker\Provider\Payment::creditCardDetails()
     */
    public function creditCardDetails($valid = true)
    {
        return parent::creditCardDetails($valid);
    }
}
