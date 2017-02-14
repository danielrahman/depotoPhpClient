<?php

namespace Depoto\GraphQL;

use QueryBuilder\Query\QueryBuilder as Base;

class QueryBuilder extends Base
{
    /**
     * @param array $arguments
     *
     * @return BuilderInterface|BuilderTrait $this
     */
    public function arguments(array $arguments)
    {
        if (empty($this->arguments)) {
            $this->processArgumentsNames($arguments);

            $args = json_encode($arguments, JSON_UNESCAPED_UNICODE);
            $this->arguments = $this->replacePlaceholders(sprintf('(%s)', substr($args, 1, strlen($args) - 2)));
        }

        $this->processEnums();

        return $this;
    }
}
