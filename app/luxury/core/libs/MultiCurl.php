<?php

    namespace luxury\libs;

    class MultiCurl
    {
        private static $code = 0;
        private $mh;

        private function init()
        {
            $this->mh = curl_multi_init();
        }

        public function execute($url, $threads)
        {
            $this->init();
            for ($i = 0; $i < $threads; $i++)
            {
                $this->addMultiHandle($url);
            }
            $curRunning = null;
            $running = null;
            $status = null;
            $content = false;
            do
            {
                curl_multi_exec($this->mh, $curRunning);
                if ($curRunning != $running)
                {
                    $mhinfo = curl_multi_info_read($this->mh);
                    if (is_array($mhinfo) && ($ch = $mhinfo['handle']))
                    {
                        $status = curl_getinfo($ch);
                        if ($status['http_code'] && $status['http_code'] != 404)
                        {
                            $content = curl_multi_getcontent($ch);
                            if (strpos($content, STR_SEARCH))
                            {
                                curl_multi_remove_handle($this->mh, $mhinfo['handle']);
                                curl_close($mhinfo['handle']);
                                break;
                            }

                        }
                        curl_multi_remove_handle($this->mh, $mhinfo['handle']);
                        curl_close($mhinfo['handle']);
                        $running = $curRunning;
                    }
                }
            }while ($curRunning > 0);
            curl_multi_close($this->mh);
            return $content;
        }

        private function addMultiHandle($url)
        {
            $ch = curl_init();

            // set options
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'code=' . self::$code);

            curl_multi_add_handle($this->mh, $ch);
            self::$code++;
        }

    }
