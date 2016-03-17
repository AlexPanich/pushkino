<?php


namespace App\Http;


class Flash
{
    const TEXT_ALERT = [
        'success' => ['Выполненно!','Операция выполненна успешно'],
        'error' => ['Ошибка!', 'Возникла ошибка при выполнении операции'],
        'info' => ['Информация', '']
    ];

    public function create($title, $message, $level, $key = 'flash_message')
    {
        $title = $title ?: self::TEXT_ALERT[$level][0];
        $message = $message ?: self::TEXT_ALERT[$level][1];
        session()->flash($key, [
            'title' => $title,
            'message' => $message,
            'level' => $level,
        ]);
    }

    public function info($title = null, $message = null)
    {
        return $this->create($title, $message, 'info');
    }

    public function success($title = null, $message = null)
    {
        return $this->create($title, $message, 'success');
    }

    public function error($title = null, $message = null)
    {
        return $this->create($title, $message, 'error');
    }

    public function overlay($title = null, $message = null)
    {
        return $this->create($title, $message, 'success', 'flash_message_overlay');
    }
}