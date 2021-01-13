<?php

class Memcached extends MY_Controller
{
    public function test()
    {        
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        if ( ! $foo = $this->cache->get('foo'))
        {
                echo 'Saving to the cache!<br />';
                $foo = 'foobarbaz!';
        
                // Save into the cache for 5 minutes
                $this->cache->save('foo', $foo, 300);
        }
        
        echo $foo;
    }

    public function get_data()
    {
        $this->load->driver('cache',
        array('adapter' => 'apc', 'backup' => 'file')
        );

        $this->cache->get('foo'); // Will get the cache entry named 'my_foo'
    }

}
