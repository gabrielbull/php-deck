<?php

namespace Waredesk;

use Waredesk\Mappers\VariableMapper;
use Waredesk\Mappers\VariablesMapper;
use Waredesk\Models\Variable;

class Variables extends Controller
{
    private const ENDPOINT = '/v1-alpha/variables';

    public function create(Variable $variable): Variable
    {
        return $this->doCreate(
            self::ENDPOINT,
            $variable,
            function ($response) use ($variable) {
                return (new VariableMapper())->map($variable, $response);
            }
        );
    }

    public function update(Variable $variable): Variable
    {
        $this->validateIsNotNewEntity($variable->getId());
        return $this->doUpdate(
            self::ENDPOINT."/{$variable->getId()}",
            $variable,
            function ($response) use ($variable) {
                return (new VariableMapper())->map($variable, $response);
            }
        );
    }

    public function delete(Variable $variable): bool
    {
        $this->validateIsNotNewEntity($variable->getId());
        return $this->doDelete(self::ENDPOINT."/{$variable->getId()}");
    }

    /**
     * @return Collections\Variables|Variable[]
     */
    public function fetch(): Collections\Variables
    {
        return $this->doFetch(
            self::ENDPOINT,
            function ($response) {
                return (new VariablesMapper())->map(new Collections\Variables(), $response);
            }
        );
    }

    public function fetchOne(string $orderBy = null, string $order = self::ORDER_BY_ASC): ? Variable
    {
        return $this->doFetchOne(
            self::ENDPOINT,
            $orderBy,
            $order,
            function ($response) {
                return (new VariablesMapper())->map(new Collections\Variables(), $response);
            }
        );
    }
}
