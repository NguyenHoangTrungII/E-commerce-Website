<?php 
    class Pagination
    {

        public $connection;
	
	    public function __construct()
	    {
		
		$this->connection = new PDO('mysql:host='.$GLOBALS['DBHOST'].';dbname='.$GLOBALS['DBNAME'].';charset=utf8', $GLOBALS['DBUSER'], $GLOBALS['DBPASS']);
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$this->connection->setAttribute(PDO::ATTR_AUTOCOMMIT,0);

	    }


        // protected $_config= new ArrayObject();
        // $_config['current_page']=1;
        // $_config['total_record']=1;
        // $_config['total_page' ]=1;
        // $_config['limit' ]=10;
        // $_config['start' ]=0;
        // $_config['link_full']='';
        // $_config['link_first']='';
        // $_config['range']=9;
        // $_config['min' ]=0;
        // $_config['max' ]=0;

        protected $_config = array(
            'current_page'  => 1, // Trang hiện tại
            'total_record'  => 1, // Tổng số record
            'total_page'    => 1, // Tổng số trang
            'limit'         => 10,// limit
            'start'         => 0, // start
            'link_full'     => '',// Link full có dạng như sau: domain/com/page/{page}
            'link_first'    => '',// Link trang đầu tiên
            'range'         => 9, // Số button trang bạn muốn hiển thị 
            'min'           => 0, // Tham số min
            'max'           => 0  // tham số max, min và max là 2 tham số private
        );
         
        function get_config($key){
            return $this->_config[$key];
        }
         

        function init($config = array())
        {

            foreach ($config as $key => $val){
                if (isset($this->_config[$key])){
                    $this->_config[$key] = $val;
                }
            }

            if ($this->_config['limit'] < 0){
                $this->_config['limit'] = 0;
            }
             

            $this->_config['total_page'] = ceil($this->_config['total_record'] / $this->_config['limit']);

            if (!$this->_config['total_page']){
                $this->_config['total_page'] = 1;
            }
             
            if ($this->_config['current_page'] < 1){
                $this->_config['current_page'] = 1;
            }
             
            if ($this->_config['current_page'] > $this->_config['total_page']){
                $this->_config['current_page'] = $this->_config['total_page'];
            }
             

            $this->_config['start'] = ($this->_config['current_page'] - 1) * $this->_config['limit'];

            $middle = ceil($this->_config['range'] / 2);
     

            if ($this->_config['total_page'] < $this->_config['range']){
                $this->_config['min'] = 1;
                $this->_config['max'] = $this->_config['total_page'];
            }
            else
            {
                $this->_config['min'] = $this->_config['current_page'] - $middle + 1;
                 
                $this->_config['max'] = $this->_config['current_page'] + $middle - 1;

                if ($this->_config['min'] < 1){
                    $this->_config['min'] = 1;
                    $this->_config['max'] = $this->_config['range'];
                }
                 
                else if ($this->_config['max'] > $this->_config['total_page']) 
                {
                    $this->_config['max'] = $this->_config['total_page'];
                    $this->_config['min'] = $this->_config['total_page'] - $this->_config['range'] + 1;
                }
            }
        }

        private function __link($page)
        {
            if ($page <= 1 && $this->_config['link_first']){
                return $this->_config['link_first'];
            }

            return str_replace('{page}', $page, $this->_config['link_full']);
        }

        function html()
        {   
            $p = ' <nav aria-label="Page navigation"> ';
            if ($this->_config['total_record'] > $this->_config['limit'])
            {
                $p = '<ul class="pagination">';
                 
                if ($this->_config['current_page'] > 1)
                {
                    $p .= '<li class="page-item first"><a class="page-link"  href="'.$this->__link('1').'"><i class="tf-icon bx bx-chevrons-left"></i
                    ></a></li>';
                    $p .= '<li class="page-item prev"><a class="page-link"  href="'.$this->__link($this->_config['current_page']-1).'"><i class="tf-icon bx bx-chevron-left"></i
                    ></a></li>';
                }
                 
                for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++)
                {
                    if ($this->_config['current_page'] == $i){
                        $p .= '<li class="page-item active"><span class="page-link">'.$i.'</span></li>';
                    }
                    else{
                        $p .= '<li  class="page-item"><a class="page-link" href="'.$this->__link($i).'">'.$i.'</a></li>';
                    }
                }
     
                if ($this->_config['current_page'] < $this->_config['total_page'])
                {
                    $p .= '<li class="page-item next"><a class="page-link" href="'.$this->__link($this->_config['current_page'] + 1).'"><i class="tf-icon bx bx-chevron-right"></i
                    ></a></li>';
                    $p .= '<li class="page-item last"><a class="page-link"href="'.$this->__link($this->_config['total_page']).'"><i class="tf-icon bx bx-chevrons-right"></i
                              ></a></li>';
                }
                 
                $p .= '</ul>';
            }
            return $p;
        }


    }
?>