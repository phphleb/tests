<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;

class HTest0LogController extends Controller
{

   public function useEmergency(): void
   {
       if ($this->request()->param('type')->toString() === 'function') {
           logger()->emergency('#emergency');
       }
       if ($this->request()->param('type')->toString() === 'container') {
           $this->container->log()->emergency('#emergency');
       }
   }

    public function useAlert(): void
    {
        if ($this->request()->param('type')->toString() === 'function') {
            logger()->alert('#alert');
        }
        if ($this->request()->param('type')->toString() === 'container') {
            $this->container->log()->alert('#alert');
        }
    }

    public function useCritical(): void
    {
        if ($this->request()->param('type')->toString() === 'function') {
            logger()->critical('#critical');
        }
        if ($this->request()->param('type')->toString() === 'container') {
            $this->container->log()->critical('#critical');
        }
    }

    public function useError(): void
    {
        if ($this->request()->param('type')->toString() === 'function') {
            logger()->error('#error');
        }
        if ($this->request()->param('type')->toString() === 'container') {
            $this->container->log()->error('#error');
        }
    }

    public function useWarning(): void
    {
        if ($this->request()->param('type')->toString() === 'function') {
            logger()->warning('#warning');
        }
        if ($this->request()->param('type')->toString() === 'container') {
            $this->container->log()->warning('#warning');
        }
    }

    public function useNotice(): void
    {
        if ($this->request()->param('type')->toString() === 'function') {
            logger()->notice('#notice');
        }
        if ($this->request()->param('type')->toString() === 'container') {
            $this->container->log()->notice('#notice');
        }
    }

    public function useInfo(): void
    {
        if ($this->request()->param('type')->toString() === 'function') {
            logger()->info('#info');
        }
        if ($this->request()->param('type')->toString() === 'container') {
            $this->container->log()->info('#info');
        }
    }

    public function useDebug(): void
    {
        if ($this->request()->param('type')->toString() === 'function') {
            logger()->debug('#debug');
        }
        if ($this->request()->param('type')->toString() === 'container') {
            $this->container->log()->debug('#debug');
        }
    }

    public function useLog(): void
    {
        $level = $this->request()->param('level')->toString();
        if ($this->request()->param('type')->toString() === 'function') {
            logger()->log($level,"#$level");
        }
        if ($this->request()->param('type')->toString() === 'container') {
            $this->container->log()->log($level, "#$level");
        }
    }
}