<?php

namespace App\Console\Commands;

use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Console\Command;


class RemoveOrderFailed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:remove-failed {days}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Xoá các đơn hàng thất bại tron 7 ngày trước';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
{
    try {
        $days = $this->argument('days');
        $date = Carbon::now()->subDays($days)->toDateString();

        $this->info('Đang xoá các đơn hàng thất bại trong ' . $days .  ' ngày trước');

        $deletedOrdersCount = Orders::where('status', 'Failed')
            ->whereDate('created_at', '<=', $date)
            ->delete();

        $this->info('Đã xoá ' . $deletedOrdersCount . ' đơn hàng thất bại trong ' . $days . ' ngày trước');
    } catch (\Exception $e) {
        $this->error('Đã xảy ra lỗi: ' . $e->getMessage());
    }
}

}
