<?php
	
	namespace app\controllers;

    use luxury\libs\MultiCurl;
    use luxury\libs\Parser;
	
	class MainController extends AppController
	{
		public function indexAction()
		{
			$canonical = PATH;
			$this->setMeta('Test', 'Test главной стр', 'ключевики test');
			$this->set(compact('canonical'));	
		}

        private function executeTest()
        {
            $start = time();
            $parser = new Parser();
            $curl = new MultiCurl();
            $data = [];

            do{
                $body = $curl->execute(URL, COUNT_THREADS);

                if($body && strpos($body, STR_SEARCH))
                {
                    $parser->loadData($body);
                    $body = $parser->getDataFromSelector('body');
                    $parser->clear();
                    $data['success'] = $body;
                    break;;
                }

                if( (time() - $start) > TIMEOUT )
                {
                    $data['error'] = TIMEOUT_MSG;
                    break;
                }

            }while(true);

            $end = time();
            $total = $end - $start;
            $total = sec_to_time($total);
            $data['time'] = $total;
            return $data;
        }

		public function runAction()
		{
			if($this->isAjax())
			{
                $response = $this->executeTest();
				header("Content-type: application/json; charset=utf-8");
				echo json_encode($response);
				die;
			}
			else
			{
				throw new \Exception('Страница не найдена', 404);
			}
		}
	}