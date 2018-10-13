OldTask/src/pocketmine/scheduler/CallbackTask.php
Fetching contributors…
Cannot retrieve contributors at this time.
RawBlameHistory    
47 lines (41 sloc)  846 Bytes
<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/06/10
 * Time: 16:59
 */
declare(strict_types=1);
namespace pocketmine\scheduler;
class CallbackTask extends Task
{
    /** @var callable */
    protected $callable;
    /** @var array */
    protected $args;
    /**
     * CallbackTask constructor.
     * @param callable $callable
     * @param array $args
     */
    public function __construct(callable $callable, array $args = [])
    {
        $this->callable = $callable;
        $this->args = $args;
        $this->args[] = $this;
    }
    /**
     * @return callable
     */
    public function getCallable()
    {
        return $this->callable;
    }
    /**
     * @param int $currentTicks
     */
    public function onRun($currentTicks)
    {
        call_user_func_array($this->callable, $this->args);
    }
}
